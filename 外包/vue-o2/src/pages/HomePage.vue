<template>
    <main>
        <div class="topImg">
            <div class="img">
                <img src="/public/images/topImg1.jpg" alt="">
            </div>
            <div class="topImg-Txt topImg-Txt1">
                你 的 名 字
            </div>
            <div class="topImg-Txt topImg-Txt2">
                2017.7.26
            </div>
        </div>

        <div class="LBimg">
            <div class="LBimg-title">电影海报</div>
            <div class="LBimg-body">
                <div class="img"><img src="/public/images/img1.png" alt=""></div>
            </div>
            <div class="LBimg-item">
                <div class="LBimg-item-img"><img src="/public/images/img1.png" alt=""></div>
            </div>
        </div>
    </main>
</template>
<style>
.topImg{
    position: relative;
}
.topImg .img{
    max-height: 600px;
    min-height: 500px;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.topImg-Txt{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 80px;
    font-weight: 200;
    color: white;
    text-shadow: 0px 0px 10px #094C9E;
}
.topImg-Txt1{
    top: 5%;
    word-spacing: 20px;
    
}
.topImg-Txt2{
    bottom: 5%;
    font-size: 50px;
}
.LBimg{
    margin-top: 20px;
    border: 1px solid;
}
.LBimg-title{
    font-size: 20px;
    padding: 10px 0;
    text-align: center;
}
.LBimg-body{
    max-height: 500px;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.LBimg-item{
    padding: 10px 0;
    display: grid;
    grid-row: repeat(4,1fr);
    
}
</style>