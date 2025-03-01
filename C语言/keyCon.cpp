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
	keyup(vk);
}

void moreTime(int vk,int Mtime,int Stime = 200){
	if(Mtime){
		for(int i=0;i<=Mtime;i++){
			keypress(vk);
			Sleep(Stime);
		}
	}
}

int main()
{
	SetConsoleTitle("");
	printf("keyInput:\n");
	char u_vk[16],u_Mtime[16],u_Stime;
	int isExit = true;
	int whileTime = 0;
	
	while (isExit){
		scanf("%s%s%s", &u_vk,&u_Mtime,&u_Stime);
		printf("u_Mtime=%s,u_vk=%s,u_Stime=%d\n",u_Mtime,u_vk,u_Stime);
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
	printf("³ÌÐòÍË³ö");
	return 0;
}
