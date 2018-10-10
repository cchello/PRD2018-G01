#include <stdio.h>
#include <string.h>
///////////////////////////
//#include <time.h>
//clock_t start, stop;
//double duration;
//////////////////////////

#define MaxP 1000
#define MaxL 100
#define MaxC 81

struct pagetype {
	int next; //-2 means not checked, -1 means the end of list
	char cont[MaxL][MaxC];
} page[MaxP];

int Pn, Ln;

void read()
{
	int i, j;

	for (i=0; i<Pn; i++) {
		for (j=0; j<Ln; j++) {
			gets(page[i].cont[j]);
			page[i].next = -2;
		}
	}
}

int sortp()
{
	int head, tail, i;

	head = tail = 0;
	i = (tail+1)%Pn;
	page[0].next = -1;
	while (i!=tail) {
		if ((page[i].next == -2) && (!strcmp(page[tail].cont[Ln-1], page[i].cont[0]))) {
			page[tail].next = i;
			tail = i;
			page[tail].next = -1;
		} //end if find next page
		i = (i+1)%Pn;
	} //end while-find tail
	i = (head+1)%Pn;
	while (i!=head) {
		if ((page[i].next == -2) && (!strcmp(page[i].cont[Ln-1], page[head].cont[0]))) {
			page[i].next = head;
			head = i;
		}
		i = (i+1)%Pn;
	} //end while-find head

	return head;
}

void output(int head)
{
	int i, j;

	for (j=0; j<Ln; j++)
		printf("%s\n", page[head].cont[j]);
	for (i=page[head].next; i!=-1; i=page[i].next) {
		for (j=1; j<Ln; j++)
			printf("%s\n", page[i].cont[j]);
	}
}

int main()
{
	int casen = 1;
///////////////
//start=clock();
///////////////
	scanf("%d %d\n", &Pn, &Ln);
	read();
	printf("Scenario #%d\n", casen++);
	output(sortp());
	scanf("%d %d\n", &Pn, &Ln);
	while ( Pn || Ln ) {
		printf("\n");
		read();
		printf("Scenario #%d\n", casen++);
		output(sortp());
		scanf("%d %d\n", &Pn, &Ln);
	}
/////////////////////////////////////////
//stop=clock();
//duration=((double)(stop-start))/CLK_TCK;
//printf("Time=%f\n", duration);
/////////////////////////////////////////
	return 0;
}
