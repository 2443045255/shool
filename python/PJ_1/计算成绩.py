while1 = True
list1 = []

while while1:
    item = int(input("输入成绩(负数或超过100退出输入):"))

    if item < 0 or item > 100:
        while1 = False
    else:
        list1.append(item)

sum = 0
for i in list1:
    sum += i
a = sum / len(list1)
print(f"输入了{len(list1)}成绩，平均值为{a}")