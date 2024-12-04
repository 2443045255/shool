<template>
    <div class="PL-item">
        <div class="PL-li">
            <div class="PL-Fname flex-c" style="margin-right: 40px;">
                <div class="img" style="height: 50px;">
                    <slot name="Fname"></slot>
                </div>
                <div class="img" style="height: 70px;margin-left: 20px;">
                    <slot name="PLimg"></slot>
                </div>
            </div>
            <div class="PL-Tname flex-c" style="margin-left: 40px;">
                <div class="img" style="height: 70px;margin-right: 20px;">
                    <slot name="PLtimg"></slot>
                </div>
                <div class="img" style="height: 50px;">
                    <slot name="Tname"></slot>
                </div>
            </div>
        </div>
        <div class="PL-more">
            <slot name="more"></slot>
        </div>
    </div>
</template>
<style scoped>
.PL-item {
    padding: 15px 0;
    background: #ddd;
}

.PL-item:nth-child(2n) {
    background: #eee;
}

.PL-item:first-child {
    border-radius: 6px 6px 0 0;
}

.PL-item:last-child {
    border-radius: 0 0 6px 6px;
}

.PL-li {
    display: flex;
    justify-content: center;
}
.PL-li>div{
    width: 400px;
}
.PL-Fname>div:first-child{
    margin-left: auto;
}
.PL-more {
    margin-top: 15px;
    padding: 0 20px;
    color: #094C9E;
}
</style>