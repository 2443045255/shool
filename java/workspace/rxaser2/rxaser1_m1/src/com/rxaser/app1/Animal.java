package com.rxaser.app1;

public class Animal {
    private String name;
    private int age;

    public void 睡觉() {
        System.out.println(name + "在睡觉");
    }

    public void 吃饭() {
        System.out.println(name + "在吃饭");
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public int getAge() {
        return age;
    }
}
