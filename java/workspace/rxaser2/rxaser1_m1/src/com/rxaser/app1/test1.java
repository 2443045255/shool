package com.rxaser.app1;

import java.util.Arrays;
import java.util.Scanner;

public class test1 {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
//        System.out.print("输入第一个数:");
//        int num1 = sc.nextInt();
//        System.out.print("输入第二个数:");
//        int num2 = sc.nextInt();
//        if (num1 > num2) {
//            System.out.println(num1 + "大于" + num2);
//        }
//        if (num1 < num2) {
//            System.out.println(num1 + "小于" + num2);
//        }
//        if (num1 == num2) {
//            System.out.println(num1 + "等于" + num2);
//        }

//        System.out.print("输入成绩:");
//        float num1 = sc.nextFloat();
//        if (num1 >= 90 && num1 <= 100) {
//            System.out.println("优秀");
//        } else if (num1 >= 80) {
//            System.out.println("良");
//        } else if (num1 >= 70) {
//            System.out.println("中");
//        } else if (num1 >= 60) {
//            System.out.println("及格");
//        }
//        int i = 1;
//        int s1 = 0;
//        do {
//            if (i % 2 != 0) {
//                System.out.println(i);
//            } else {
//                s1 += i;
//            }
//            i++;
//        } while (i <= 100);
//        System.out.println(s1);


//        int s1 = 0;
//        for (int i = 0; i <= 100; i++) {
//            if (i % 2 != 0) {
//                s1 += i;
//            }
//        }
//        System.out.println(s1);
//
//        int a = sc.nextInt();
//        int b = sc.nextInt();
//        int s2 = 0;
//        for (int i = a; i <= b; i++) {
//            if (i % 3 == 0 && i % 5 == 0) {
//                s2++;
//            }
//        }
//        System.out.println(s2 + "个");

//        int[] arr1 = {11, 22, 33, 44, 55};
//        int arr1_sum = 0;
//        for (int i = 0; i < arr1.length - 1; i++) {
//            arr1_sum += arr1[i];
//        }
//        System.out.println("求和" + arr1_sum);

//        int[] arr2 = {9, 19, 8, 20, 10, 11};
//        int arr2_max = 0;
//        for (int i = 0; i < arr2.length - 1; i++) {
//            if (arr2[i] > arr2_max) {
//                arr2_max = arr2[i];
//            }
//        }
//        System.out.println("最大值" + arr2_max);

        int[] arr3 = {1, 2, 3, 4, 5};
        int[] arr3_same = {0, 0, 0, 0, 0};
        int j = 0;
        for (int i = arr3.length - 1; i >= 0; i--) {
            arr3_same[j] = arr3[i];
            j++;
        }
    }
}
