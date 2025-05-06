for i in range(4, 10001):
    print(i)
    list1 = []
    a = 1
    while a <= i:
        if i % a == 0:
            list1.append(a)
        a += 1
    for j in list1:
        sum += j
    if sum == i:
        print(f"{i}是完数")