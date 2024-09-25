#include <stdio.h>
#include <stdlib.h>
#define ListSize 10 

typedef struct{
	int *data;
	int length;
}SeqList;

//①初始化表
void InitList(SeqList* L){
	L->data=(int *)malloc(sizeof(int)*ListSize);
	L->length=5;
}

//②判断是否是空表
void ListEmpty(SeqList* L){
	if(L->length == 0)
		printf("L是空表\n");
	else
		printf("L不是空表\n");	
}

//③求线性表的长度
int ListLength(SeqList* L){
	return L->length;
}

//④输出线性表
void DispList(SeqList* L){
	for(int i=0;i <= L->length-1;i++){
		printf("%d ",L->data[i]);
	}	
	printf("\n");
}

//⑤按位查找
int GetElem(SeqList* L,int index){
	if(index<1 || index>L->length) //非法位置 
		return -1;  //用-1作错误标识 
	return L->data[index-1];
}
// ⑥按值查找
int LocateElem(SeqList* L,int e){
	for(int i=0;i <= L->length-1;i++){
		if(e == L->data[i]){
			return i+1;
		}
	}
	return -1;
}
//⑦插入
int ListInsert(SeqList* L,int i,int e){
	if(i<1 || i>L->length+1){ //判断i的范围是否有效 
		return 0; //用0代表假 
	}
	if(L->length == ListSize){
		return 0; //用0代表假
	}
	for(int j=L->length-1;j>=i-1;j--){
		L->data[j+1] = L->data[j];
	}
	L->data[i-1] = e;
	L->length++;
	return 1; //用1表示真 
}

//⑧删除数据元素
int ListDelete(SeqList* L,int i){
	if(i<1 || i>L->length){ //非法区间 
		return 0; //返回错误 
	}
	for(int j=i-1;j<L->length-1;j++){
		L->data[j] = L->data[j+1];//前移 
	}
	L->length--; //顺序表长度减一 
	return 1; //返回成功 
}
 
int main(){
	SeqList L;	
	InitList(&L);
	printf("%d\n",L.length);
	ListEmpty(&L);
	int n = ListLength(&L);
	printf("当前线性表的长度为：%d\n",n);
	DispList(&L);
	printf("\n");
	printf("按位查找的元素为：%d\n",GetElem(&L,11));
	printf("按值查找的位置为：%d\n",LocateElem(&L,0));
	
	ListInsert(&L,1,100);
	DispList(&L);
	
	ListDelete(&L,1);
	DispList(&L);
	return 0;
}
