// 42answer.cpp : 定义控制台应用程序的入口点。
//

#include "stdafx.h"


int main()
{
	int n;
	while(scanf("%d", &n) && n != 42){
		printf("%d\n", n);
	}
}
