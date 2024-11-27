<template>
    <div class="PL-item">
        <div class="PL-li">
            <div class="PL-img">
                <slot name="PLimg"></slot>
            </div>
            <div class="PL-info">
                <div class="PL-Fname">
                    <span>饰演：</span>
                    <div class="img" style="height: 30px;">
                        <slot name="Fname"></slot>
                    </div>
                </div>
                <div class="PL-Tname">
                    <span>CV：</span>
                    <div class="img">
                        <slot name="Tname"></slot>
                    </div>
                </div>

            </div>
        </div>
        <div class="PL-more">
            <slot name="more"></slot>
        </div>
    </div>
</template>
<style>
.PL-li {
    display: flex;
}

.PL-img {
    height: 80px;
}

.PL-info {
    background: #ddd;
}

.PL-Fname {
    display: flex;
}
</style>