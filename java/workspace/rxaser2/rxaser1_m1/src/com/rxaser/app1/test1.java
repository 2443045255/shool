package com.rxaser.app1;

import java.util.Scanner;

public class test1 {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("输入身高:");
        float height = sc.nextFloat();
        System.out.println("我的身高是:" + height + "厘米");
        System.out.print("输入体重:");
        float wight = sc.nextFloat();
        System.out.println("输入体重:" + wight + "kg");
    }
}
