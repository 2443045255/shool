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

int main()
{
	SetConsoleTitle("���Ƽ���");
	char userInput;
	int isExit = true;

	while (isExit)
	{
		//		printf("�����ֵ��");
		scanf(" %c", &userInput);
		if (userInput == '0')
		{
			isExit = false;
		}
		if (userInput >= 'a' && userInput <= 'z')
		{
			userInput -= 32;
			keypress(userInput);
		}
		else if (userInput >= 'A' && userInput <= 'Z')
		{
			userInput -= 0;
			keypress(userInput);
		}
		// printf("%d\n",userInput);
	}
	printf("�����˳�");
	return 0;
}
