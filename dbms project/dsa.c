#include <stdio.h>
#include <stdlib.h>


struct node{
    int vertex;
    int weight ;
    struct node *next;
};


struct Graph{

    int numVertices;
    int *cuv ;
    // We need int** to store a two dimensional array.
    // Similary, we need struct node** to store an array of Linked lists
    struct node **adjLists;
};


// Create a node
struct node *createNode(int v, int w ){

    struct node *newNode = malloc(sizeof(struct node));
    newNode->vertex = v;
    newNode->weight = w;
    newNode->next = NULL;
    return newNode;
}

// Create graph

struct Graph *createGraph(int vertices){

    struct Graph *graph = malloc(sizeof(struct Graph));
    graph->numVertices = vertices;
    graph->adjLists = malloc(vertices * sizeof(struct node *));
    graph->cuv = malloc(vertices * sizeof(int));
    int i;
    for (i = 0; i < vertices; i++)
    {
        graph->adjLists[i] = NULL;
        graph->cuv[i] = INT_MAX ;
    }
    return graph;
}

/*
// Add edge
void addEdge(struct Graph *graph, int src, int dest , int weight ){

    // Add edge from src to dest
    struct node *newNode = createNode(dest, weight);
    newNode->next = graph->adjLists[src];
    graph->adjLists[src] = newNode;
    // Add edge from dest to src
    newNode = createNode(src );
    newNode->next = graph->adjLists[dest];
    graph->adjLists[dest] = newNode;
}

*/

void forPrint(struct Graph * graph ){
    struct node * temp ; 
    for( int i = 0 ; i<graph->numVertices ; i++ ){
        temp = graph->adjLists[i];
        printf("\n%d (%d) ", temp->vertex , temp->weight ); 
        temp = temp->next ;
        while(temp != NULL ){
            printf("-> %d (%d) ", temp->vertex , temp->weight ); 
            temp = temp->next ;
        }
    }

}

struct Graph * creategraph(int source , int j , struct Graph * graph){
  
    struct node * src  = createNode(source , INT_MAX );
    graph->adjLists[j] = src ; 
    struct node * temp = src ;
    int edges , i  ;
    int dest , w ;
    printf("\nEnter number of edges %d makes with other vertices: ", source );
    scanf("%d", &edges);
     
    for ( i = 0; i < edges; i++){
        printf("For edge number %d;\n", (i + 1 ) ) ;
        printf("Enter the dest  and weight: ");
        scanf("%d %d", &dest , &w );
        struct node * newnode = createNode(dest , w ) ;
        temp->next = newnode ;
        temp = newnode ;
    }
   
    return graph ;

}

void bellmanPrint(struct Graph * graph ){
    struct node * temp ; 
    for( int i = 0 ; i<graph->numVertices ; i++ ){
        temp = graph->adjLists[i];
        printf("\n%d - %d ", temp->vertex , temp->weight ); 
        
    }

}

struct Graph * bell(struct Graph * graph, int j ){
    int num1 , num2 ;
    struct node *temp = graph->adjLists[j]->next ;
    while(temp !=NULL ){
        num1 = graph->adjLists[j]->weight + temp->weight ;
        // add algo to find the vertex here 
        num2 = graph->adjLists[temp->vertex]->weight;
                
        if( num1 < num2 ){
            graph->adjLists[temp->vertex]->weight = num1 ;
        }

        temp = temp->next ;
    }
    return graph ;
}

int swap( struct Graph * graph ){
    int swap = 0 ;

    for( int j = 0 ; j< graph->numVertices  ; j++ ){

        int num1 , num2 ;
        struct node *temp = graph->adjLists[j]->next ;
        while(temp !=NULL ){
        num1 = graph->adjLists[j]->weight + temp->weight ;
        // add algo to find the vertex here 
        num2 = graph->adjLists[temp->vertex]->weight;
                
        if( num1 < num2 ){
            graph->adjLists[temp->vertex]->weight = num1 ;
             swap = 1 ;
             break ;
        }

        temp = temp->next ;
        }
    }
    return swap ;
            
}

struct Graph * bellman(struct Graph * graph ){
    int i, j , num1 , num2 ;
   
    for(j = 0 ; j< graph->numVertices - 1; j++ ){
        for( i = 0 ; i< graph->numVertices  ; i++ ){
            graph = bell(graph ,  i );
              //printf("\n");
              //bellmanPrint( graph );
        }
    }
    return graph ;

}


void  main(){
    
    int num, i, ver[20] , v ;
    printf("Enter no.of vertices:");
    scanf("%d", &num);

    struct Graph *graph = createGraph(num);
    for( i = 0 ; i<num ; i++ ){
        printf("Enter vertices num %d: ", ( i + 1 ) );
        scanf("%d", &v );
        ver[i] = v ;
    }
    

    
    int edges;

    for( int j =0 ;j<num ; j++){
    printf("\nFor vertice %d: ", ver[j] );
    
    graph = creategraph(ver[j],  j  ,graph );
    
    }
   
    printf("\n");
    forPrint( graph );

    int root ;
    printf("\nEnter the root:");
    scanf("%d", &root);

    graph->adjLists[0]->weight = 0 ; 

    graph = bellman(graph);

    printf("\nfinal ans:\n");
    bellmanPrint( graph );
    if(swap(graph) == 1 ){
        printf("\nThis graph cannot be solved by Bellman method.");
    }

}