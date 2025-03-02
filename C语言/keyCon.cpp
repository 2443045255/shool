#include <bits/stdc++.h>
#include <conio.h>
#include <windows.h>
#include <stdio.h>

#pragma comment(linker, "/subsystem:windows /entry:mainCRTStartup")
void keydown(int vk)
{
	keybd_event(vk, 0, 0, 0);
}

void keyup(int vk)
{
	keybd_event(vk, 0, KEYEVENTF_KEYUP, 0);
}

void keypress(int vk)
{
	keydown(vk);
	Sleep(10);
	keyup(vk);
}

void moreTime(int vk,int Mtime,int Stime){
	if(Mtime){
		for(int i=1;i<=Mtime;i++){
			keypress(vk);
			Sleep(Stime);
			if(i == Mtime){
				printf("已完成(%d,%d,%d)\n",vk,Mtime,Stime);
			}
		}
	}
}

int main()
{
	SetConsoleTitle("");
	printf("keyInput:\n");
	int u_vk;
	int u_Mtime,u_Stime;
	int old_vk;
	int isExit = true;
	int whileTime = 0;
	
	while (isExit){
		u_vk = 0;
		scanf("%d",&u_vk);
		
		if(u_vk == 0){
			scanf("%s",&u_vk);
		}
		
		if(u_vk >= 'a' && u_vk <= 'z'){
			u_vk = u_vk - 32;
		}
//		if(u_vk >= 'A' && u_vk <= 'Z'){
//			
//		}
		printf("u_vk=%d",u_vk);
		scanf("%c",&u_Mtime);
		
		if(u_Mtime == 32){
			scanf("%d",&u_Mtime);
		}
		
		if(u_Mtime == 10){
			u_Mtime = 1;
			u_Stime = 100;
		}else{
			scanf("%c",&u_Stime);
			
			if(u_Stime == 32){
				scanf("%d",&u_Stime);
			}
			
			if(u_Stime == 10){
				u_Stime = 100;
			}
		}
		
		printf("u_vk(按键)=%d,u_Mtime(次数)=%d,u_Stime(延迟)=%d\n",u_vk,u_Mtime,u_Stime);
		
		moreTime(u_vk,u_Mtime,u_Stime);
		
		fflush(stdin);
		
		
//		if (userInput == '0'){
//			isExit = false;
//		}if (userInput >= 'a' && userInput <= 'z'){
//			userInput -= 32;
//			keypress(userInput);
////			keydown(userInput);
////			Sleep(0);
////			keyup(userInput);s
//		}else if (userInput >= 'A' && userInput <= 'Z'){
//			userInput -= 0;
//			keypress(userInput);
//		}else{
//			keypress(userInput);
//		}
//		// printf("%d\n",userInput);
		if(whileTime>=100){
			isExit = false;
		}
		whileTime++;
	}
	printf("程序退出");
	return 0;
}
