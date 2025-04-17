province_1 = ""
city_1 = ""


def enter_city():
    global province_1, city_1
    province_1 = input("输入省份:")
    city_1 = input("输入城市:")
    return


def show_city():
    print(province_1, city_1)
    return


enter_city()
show_city()
