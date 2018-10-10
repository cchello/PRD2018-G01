#include <stdio.h>
#include <malloc.h>
//#include <string.h>
///////////////////////////
//#include <time.h>
//clock_t start, stop;
//double duration;
//////////////////////////

#define MAXN 1000

int N;

struct TableRecord {
	int TableSize;
	int T[MAXN];
};
typedef struct TableRecord *Table;

struct GraphRecord {
	int NumVert;
	int M[MAXN][MAXN];
};
typedef struct GraphRecord *Graph;

struct HeapRecord {
	int Index;
	int Num;
};
typedef struct HeapRecord *HeapPt;

struct HeapStruct {
	int HeapSize;
	HeapPt Elements;
};
typedef struct HeapStruct *MinHeap;

Table read()
{
	int i;
	Table Hash = (Table)malloc( sizeof( struct TableRecord ) );

	Hash->TableSize = N;
	for (i=0; i<N; i++)
		scanf("%d", &Hash->T[i]);
	
	return Hash;
}

Graph ConstructG( Table Hash )
{	
	int i, j;
	Graph G = (Graph)malloc( sizeof( struct GraphRecord ) );

	for ( i=0; i<Hash->TableSize; i++ )
		for ( j=0; j<Hash->TableSize; j++ )
			G->M[i][j] = 0;
	for ( i=0; i<Hash->TableSize; i++ ) {
		if ( !(Hash->T[i] < 0) ) {  //只处理非空的单元
			j = Hash->T[i]% Hash->TableSize; //计算散列值
			while ( i != j )	{  //若当前位置i与探测位置j不同
				G->M[j][i] = 1; //在图中添加一条指向i的边
				j = (j+1)% Hash->TableSize; //探测下一个位置
			}
		}
	}
	G->NumVert = Hash->TableSize;
	return G;
}

void InsertHeap( HeapPt X, MinHeap Q )
{
	int i;

	for ( i = ++Q->HeapSize; Q->Elements[i/2].Num>X->Num; i/=2 ) {
		Q->Elements[i].Num = Q->Elements[i/2].Num;
		Q->Elements[i].Index = Q->Elements[i/2].Index;
	}
	Q->Elements[i].Num = X->Num;
	Q->Elements[i].Index = X->Index;

//	printf("inside %d,%d size %d\n", X->Index, X->Num, Q->HeapSize);
}

HeapPt DeleteMin( MinHeap Q )
{
	int i, child;
	HeapPt MinT = (HeapPt)malloc( sizeof( struct HeapRecord ) );
	HeapPt LastT = (HeapPt)malloc( sizeof( struct HeapRecord ) );

	MinT->Num = Q->Elements[1].Num;
	MinT->Index = Q->Elements[1].Index;
	LastT->Num = Q->Elements[Q->HeapSize].Num;
	LastT->Index = Q->Elements[Q->HeapSize--].Index;

//printf("min %d,%d last %d,%d\n", MinT->Index, MinT->Num, LastT->Index, LastT->Num);

	for (i=1; i*2<=Q->HeapSize; i=child ) {
		child = i*2;
		if ( child!=Q->HeapSize && Q->Elements[child+1].Num<Q->Elements[child].Num )
			child++;
		if ( LastT->Num > Q->Elements[child].Num ){
			Q->Elements[i].Num = Q->Elements[child].Num;
			Q->Elements[i].Index = Q->Elements[child].Index;
		}
		else break;
	}
	Q->Elements[i].Num = LastT->Num;
	Q->Elements[i].Index = LastT->Index;

//	for (i=0; i<=Q->HeapSize; i++)
//		printf("%d,%d ", Q->Elements[i].Index, Q->Elements[i].Num);


	return MinT;
}


void Topsort( Graph G, Table Hash )
{   
	MinHeap Q = (MinHeap)malloc( sizeof( struct HeapStruct ) );
	HeapPt Tmp = (HeapPt)malloc( sizeof( struct HeapRecord ) ); //临时堆结点
	int  i, j, InDegree[MAXN];
	int flag = 0;

//    Q = CreateMinHeap ( G->NumVert );  MakeEmpty( Q ); //初始化最小堆
	Q->Elements = (HeapPt)malloc( (G->NumVert+1) * sizeof( struct HeapRecord ) );
	Q->HeapSize = 0;
	Q->Elements[0].Num = -1;
	for ( i=0; i<G->NumVert; i++ ) {
		InDegree[i] = 0;
		if ( !(Hash->T[i]<0) ) { //对每个非空单元的元素，计算入度
			for ( j=0; j<G->NumVert; j++ )
				InDegree[i] += G->M[j][i];
			if ( !InDegree[i] ){ //入度为0者存入最小堆

//				printf("insert %d,%d ", i, Hash->T[i]);

				Tmp->Index = i;  Tmp->Num = Hash->T[i];
				InsertHeap( Tmp, Q );
			}
		}
	}

//	for (i=0; i<=Q->HeapSize; i++)
//		printf("%d,%d ", Q->Elements[i].Index, Q->Elements[i].Num);

    while ( Q->HeapSize ) {
		Tmp = DeleteMin( Q ); //输出当前最小的入度为0的元
		if ( flag )
			printf(" %d", Tmp->Num);
		else {
			printf("%d", Tmp->Num);
			flag = 1;
		}
		i = Tmp->Index;
		for (j=0; j<G->NumVert; j++ ) {
			if ( G->M[i][j] ) {
				InDegree[j]--; //将该结点从图中删去
				if ( !InDegree[j] ) {  //入度为0者存入最小堆
					Tmp->Index = j;  Tmp->Num = Hash->T[j];
					InsertHeap( Tmp, Q );
				}
			}
		}
    }
	printf("\n");
	free(Q);
	free(Tmp);
}

int main()
{
	Graph G;
	Table Hash;
///////////////
//start=clock();
///////////////
	scanf("%d", &N);
	while ( N ) {
		Hash = read();
//		printf("read ok\n");
		G = ConstructG(Hash);
//		printf("graph ok\n");
		Topsort(G, Hash);
		scanf("%d", &N);
	}
/////////////////////////////////////////
//stop=clock();
//duration=((double)(stop-start))/CLK_TCK;
//printf("Time=%f\n", duration);
/////////////////////////////////////////
	free(G);
	free(Hash);
	return 0;
}
