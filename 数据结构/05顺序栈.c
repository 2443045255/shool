#include <stdio.h>
#include <stdlib.h>
#define StackSize 100  //ջ��������� 

//˳��ջ�����Ͷ���
typedef struct{
	int data[StackSize]; //���� 
	int top; //��¼ջ��λ�� 
}SeqStack;
 //�ٳ�ʼ��˳��ջ	
void InitStack(SeqStack *S){
	S->top = -1;
}
//���ж�ջ�Ƿ�Ϊ��
int StackEmpty(SeqStack *S){
	if(S->top==-1){
		return 1; //�����������ǿ�ջ 
	}else{
		return 0;
	}
}
//���ж�ջ�Ƿ�Ϊ��
int StackFull(SeqStack *S){
	return S->top == StackSize-1;
}
//�ܽ�ջ����
void Push(SeqStack *S,int e){
	if(StackFull(S)) {
		printf("ջ����������\n");
	}else{
		S->top++; // ����
		S->data[S->top] = e;// ��ջ 
	}
}
//�ݳ�ջ����
int Pop(SeqStack *S){
	if(StackEmpty(S)){
		printf("��ջ��������\n");
	}else{
		int x = S->data[S->top]; //ȡֵ 
		S->top--; //���� 
		return x;
	}
}
//��ȡջ��Ԫ��
int StackTop(SeqStack *S){
	if(StackEmpty(S)){
		printf("��ջ����Ԫ��\n");
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
	printf("ջ��Ԫ���ǣ�%d\n",StackTop(&S)); //30
	printf("��ջԪ���ǣ�%d\n",Pop(&S));//30
	printf("ջ��Ԫ���ǣ�%d\n",StackTop(&S)); //20
	
	return 0;
}
