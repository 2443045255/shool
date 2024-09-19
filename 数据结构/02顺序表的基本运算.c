#include <stdio.h>
#include <stdlib.h>
#define ListSize 10 

typedef struct{
	int *data;
	int length;
}SeqList;

//�ٳ�ʼ����
void InitList(SeqList* L){
	L->data=(int *)malloc(sizeof(int)*ListSize);
	L->length=5;
}

//���ж��Ƿ��ǿձ�
void ListEmpty(SeqList* L){
	if(L->length == 0)
		printf("L�ǿձ�\n");
	else
		printf("L���ǿձ�\n");	
}

//�������Ա�ĳ���
int ListLength(SeqList* L){
	return L->length;
}

//��������Ա�
void DispList(SeqList* L){
	for(int i=0;i <= L->length-1;i++){
		printf("%d ",L->data[i]);
	}	
	printf("\n");
}

//�ݰ�λ����
int GetElem(SeqList* L,int index){
	if(index<1 || index>L->length) //�Ƿ�λ�� 
		return -1;  //��-1�������ʶ 
	return L->data[index-1];
}
// �ް�ֵ����
int LocateElem(SeqList* L,int e){
	for(int i=0;i <= L->length-1;i++){
		if(e == L->data[i]){
			return i+1;
		}
	}
	return -1;
}
//�߲���
int ListInsert(SeqList* L,int i,int e){
	if(i<1 || i>L->length+1){ //�ж�i�ķ�Χ�Ƿ���Ч 
		return 0; //��0����� 
	}
	if(L->length == ListSize){
		return 0; //��0�����
	}
	for(int j=L->length-1;j>=i-1;j--){
		L->data[j+1] = L->data[j];
	}
	L->data[i-1] = e;
	L->length++;
	return 1; //��1��ʾ�� 
}

//��ɾ������Ԫ��
int ListDelete(SeqList* L,int i){
	if(i<1 || i>L->length){ //�Ƿ����� 
		return 0; //���ش��� 
	}
	for(int j=i-1;j<L->length-1;j++){
		L->data[j] = L->data[j+1];//ǰ�� 
	}
	L->length--; //˳����ȼ�һ 
	return 1; //���سɹ� 
}
 
int main(){
	SeqList L;	
	InitList(&L);
	printf("%d\n",L.length);
	ListEmpty(&L);
	int n = ListLength(&L);
	printf("��ǰ���Ա�ĳ���Ϊ��%d\n",n);
	DispList(&L);
	printf("\n");
	printf("��λ���ҵ�Ԫ��Ϊ��%d\n",GetElem(&L,11));
	printf("��ֵ���ҵ�λ��Ϊ��%d\n",LocateElem(&L,0));
	
	ListInsert(&L,1,100);
	DispList(&L);
	
	ListDelete(&L,1);
	DispList(&L);
	return 0;
}
