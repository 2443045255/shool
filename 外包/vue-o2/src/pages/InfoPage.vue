<template>
    <main>
        <div class="talk">
            <div class="talk-title">组件相互传值</div>
            <div class="flex" style="justify-content: space-around;">
                <div class="talk-p talk-p1">
                    <div class="talk-send">
                        <span>要说的话:</span>
                        <input type="text" class="input-text" v-model="P1_talk">
                    </div>
                    <div class="talk-get">
                        <span>听到对面的话:</span>
                        <span>{{ P2_talk }}</span>
                    </div>
                </div>
                <P2Talk :msg="P1_talk" @send="get" />
            </div>
        </div>
        <div class="PL">
            <div class="PL-title">演员表</div>
            <div class="PL-body">
                <PeopleList v-for="key in peopleArr" :key="key">
                    <template #PLimg>
                        <img :src="key['img']" alt="">
                    </template>
                    <template #Fname>
                        <img :src="key['Fname']" alt="">
                    </template>
                </PeopleList>
            </div>
        </div>
    </main>
</template>
<script setup>
import P2Talk from '@/components/P2Talk.vue';
import PeopleList from '@/components/PeopleList.vue';
import { ref } from 'vue';

const P1_talk = ref('')
const P2_talk = ref('')
function get(value) {
    P2_talk.value = value
}

const peopleArr = ref([
    {
        'img': 'public/images/people/1.png',
        'Fname': 'public/images/people/1_Fname.png',
        'Tname': 'public/images/people/1_Tname.png',
        'more': '東京の都心に暮らす男子高校生。日々、友人たちと楽しく過ごし、イタリアンレストランでバイト中。同僚の奥寺先輩へひそかに好意を寄せている。建築や美術に興味を持っている。'
    }
])
</script>
<style>
.talk-title {
    font-size: 20px;
    text-align: center;
    margin-bottom: 10px;
}

.talk-p {
    border-radius: 6px;
    border: 1px solid;
    padding: 13px;
}

.talk-send>span,
.talk-get>span {
    margin-right: 10px;
}

.talk-get {
    margin-top: 5px;
}
.PL{
    margin-top: 15px;
    padding: 15px;
    background: white;
    border-radius: 10px;
}
.PL-title{
    font-size: 20px;
    text-align: center;
    margin-bottom: 10px;
}
</style>
