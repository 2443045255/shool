s = int(input("输入一个时间值:"))

time = 24 * 3600 - s
hours = time // 3600
minutes = (time % 3600) // 60
seconds = time % 60

print(f"{hours:02}:{minutes:02}:{seconds:02}")
