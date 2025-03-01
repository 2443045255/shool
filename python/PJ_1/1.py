num = int(input("请输入一个年份"))
if num % 400 == 0:
    print(f"{num}是闰年")
else:
    print(f"{num}不是闰年")
