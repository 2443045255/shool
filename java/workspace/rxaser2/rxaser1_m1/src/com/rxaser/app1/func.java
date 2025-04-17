package com.rxaser.app1;

public abstract class func {
    public static void main(String[] args) {
        System.out.println(sdad(2, 1));

    }

    //计算矩形周长
    public static int func1(int a, int b) {
        return (a + b) * 2;
    }

    //定义方法求数组每个元素的和
    public static int arrItemSum(int[] arr) {
        int sum = 0;
        for (int i = 0; i < arr.length; i++) {
            sum += arr[i];
        }
        return sum;
    }

    //定义一个方法将数组按指定格式输出
    public static void arrOutput(int[] arr) {
        String txt = "[";
        for (int i = 0; i < arr.length; i++) {
            txt += arr[i];
            if (i == arr.length - 1) {
                txt += "]";
            } else {
                txt += ",";
            }
        }
        txt += "]";
        System.out.println(txt);
    }

    public static int sdad(int a, int b) {
        return a < b ? b : a;
    }
}
