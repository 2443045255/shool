#include <stdio.h>
#include <stdlib.h>
#define StackSize 100  //栈的最大容量 

//顺序栈的类型定义
typedef struct{
	int data[StackSize]; //数据 
	int top; //记录栈顶位置 
}SeqStack;
 //①初始化顺序栈	
void InitStack(SeqStack *S){
	S->top = -1;
}
//②判断栈是否为空
int StackEmpty(SeqStack *S){
	if(S->top==-1){
		return 1; //成立，代表是空栈 
	}else{
		return 0;
	}
}
//③判断栈是否为满
int StackFull(SeqStack *S){
	return S->top == StackSize-1;
}
//④进栈操作
void Push(SeqStack *S,int e){
	if(StackFull(S)) {
		printf("栈满，会上溢\n");
	}else{
		S->top++; // 上移
		S->data[S->top] = e;// 入栈 
	}
}
//⑤出栈操作
int Pop(SeqStack *S){
	if(StackEmpty(S)){
		printf("空栈，会下溢\n");
	}else{
		int x = S->data[S->top]; //取值 
		S->top--; //下移 
		return x;
	}
}
//⑥取栈顶元素
int StackTop(SeqStack *S){
	if(StackEmpty(S)){
		printf("空栈，无元素\n");
	}else{
		return S->data[S->top];
	}
}

int main(){
	SeqStack S;
	InitStack(&S);
	Push(&S,10); 
	Push(&S,20); 
	Push(&S,30); 
	printf("栈顶元素是：%d\n",StackTop(&S)); //30
	printf("出栈元素是：%d\n",Pop(&S));//30
	printf("栈顶元素是：%d\n",StackTop(&S)); //20
	
	return 0;
}
