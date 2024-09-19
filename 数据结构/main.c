#include <stdio.h>
#include <stdlib.h>
#define ListSize 10

typedef struct
{
	int *data;
	int length;
} SeqList;

// ①初始化表
void InitList(SeqList *L)
{
	L->data = (int *)malloc(sizeof(int) * ListSize);
	L->length = 5;
}

// ②判断是否是空表
void ListEmpty(SeqList *L)
{
	if (L->length == 0)
		printf("L是空表\n");
	else
		printf("L不是空表\n");
}

// ③求线性表的长度
int ListLength(SeqList *L)
{
	return L->length;
}

// ④输出线性表
void DispList(SeqList *L)
{
	for (int i = 0; i <= L->length - 1; i++)
	{
		printf("%d ", L->data[i]);
	}
}

int main()
{
	SeqList L;
	InitList(&L);
	printf("%d\n", L.length);
	ListEmpty(&L);
	int n = ListLength(&L);
	printf("当前线性表的长度为：%d\n", n);
	DispList(&L);

	return 0;
}