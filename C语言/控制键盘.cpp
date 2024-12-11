#include <bits/stdc++.h>
#include <conio.h>
#include <windows.h>
#include <stdio.h>

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
	// SetConsoleTitle("控制键盘");
	int userInput = 0, isExit = true;

	while (isExit)
	{
		printf("输入键值：");
		scanf("%d", &userInput);
		if (userInput == 0)
		{
			isExit = false;
		}
		else
		{
			keypress(userInput);
		}
		// printf("%d\n",userInput);
	}
	printf("程序退出");
	return 0;
}
