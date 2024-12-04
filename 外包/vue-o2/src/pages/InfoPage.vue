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
                        <img :src="sameUrl + key['img']" alt="">
                    </template>
                    <template #Fname>
                        <img :src="sameUrl + key['Fname']" alt="">
                    </template>
                    <template #PLtimg>
                        <img :src="sameUrl + key['Timg']" alt="">
                    </template>
                    <template #Tname>
                        <img :src="sameUrl + key['Tname']" alt="">
                    </template>
                    <template #more>
                        <p>{{ key['more'] }}</p>
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

const sameUrl = '/images/people/'
const peopleArr = ref([
    {
        'img': '1.png',
        'Fname': '1_Fname.png',
        'Timg': '1_T.png',
        'Tname': '1_Tname.png',
        'more': '東京の都心に暮らす男子高校生。日々、友人たちと楽しく過ごし、イタリアンレストランでバイト中。同僚の奥寺先輩へひそかに好意を寄せている。建築や美術に興味を持っている。'
    },
    {
        'img': '2.png',
        'Fname': '2_Fname.png',
        'Timg': '2_T.png',
        'Tname': '2_Tname.png',
        'more': '山深い田舎町に住む女子高校生。町長である父は家を出ており、小学生の妹、祖母と３人暮らし。性格は素直だが、家系の神社の風習や、父の選挙運動などに嫌気が差している。友人たちと小さく狭い町を嘆き、東京の華やかな生活に憧れを抱いている。'
    },
    {
        'img': '3.png',
        'Fname': '3_Fname.png',
        'Timg': '3_T.png',
        'Tname': '3_Tname.png',
        'more': '1993年5月19日生まれ、埼玉県出身。1999年、ドラマ「グッドニュース」（TBS）でデビュー。映画『妖怪大戦争』（05年）で第29回日本アカデミー賞新人俳優賞を受賞。近年の出演作に、『桐島、部活やめるってよ』（12年）、『るろうに剣心 京都大火編／伝説の最期編』（14年）、『神さまの言うとおり』（14年）、『バクマン。』（15年）、『太陽』（16年）、『TOO YOUNG TO DIE！ 若くして死ぬ』（16年）など。2017年には主演作『3月のライオン』（前編・後編）が公開予定。アニメーション映画への声の出演としては、『千と千尋の神隠し』（01年）、『ハウルの動く城』（04年）、『サマーウォーズ』（09年）、『借りぐらしのアリエッティ』（10年）、『とある飛空士への追憶』（11年）などの作品に参加し、高い評価を得ている。'
    },
    {
        'img': '4.png',
        'Fname': '4_Fname.png',
        'Timg': '4_T.png',
        'Tname': '4_Tname.png',
        'more': '1998年1月27日生まれ、鹿児島県出身。2011年、第7回「東宝シンデレラ」オーディション審査員特別賞を受賞して、「江～姫たちの戦国～」（11年NHK）で女優デビュー。『舞妓はレディ』（14年）では800名の応募者からオーディションを勝ち抜き、主人公・春子に大抜擢される。同作品で、山路ふみ子映画賞・第26回新人女優賞、第38回日本アカデミー賞新人俳優賞を受賞。ほか出演作に、ショートムービー『空色物語 第四話「上白石萌音～ニケとかたつむり～」』（11年）、映画『だいじょうぶ３組』（13年）、 『ちはやふる 上の句／下の句』（16年）。『溺れるナイフ』（16年秋公開予定）。声優としては、『おおかみこどもの雨と雪』（12年）に出演している。'
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

.PL {
    margin-top: 15px;
    padding: 15px;
    background: white;
    border-radius: 10px;
}

.PL-title {
    font-size: 20px;
    text-align: center;
    margin-bottom: 10px;
}
</style>
