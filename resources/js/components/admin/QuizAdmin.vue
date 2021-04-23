<template>
    <div class="quiz_admin">
      <div class="display">
        <sideBar />
        <div class="adminMain">
          <h1>沖縄クイズ管理者画面</h1>
          <h2>Quiz List</h2>
          <div class="text">
            <p>問題数:{{ quizCount }}</p>
          </div>
          <div id="delete" v-if="deleteDisplay">
            <div id="content">
              {{ quizId }}
              {{ selectQuiz }}
              <p class="selectBtn delete" @click="doDelete">削除</p>
              <p class="selectBtn cansel" @click="cancel">キャンセル</p>
            </div>
          </div>
          <table>
            <th class="tableHeader">問題</th>
            <th class="tableHeader">画像</th>
            <th class="tableHeader">カテゴリーID</th>
            <th class="tableHeader">操作</th>
            <tbody>
              <tr v-for="item in quiz">
                <th>{{ item.question }}</th>
                <td class="img"><img class="img" :src="`${item.image_name}`" /></td>
                <td>{{ item.category_id }}</td>
                <td><RouterLink :to="{name: 'quiz_edit', params: {list: item}}">編集</RouterLink> / <span class="selectBtn1" @click="deleteCheck(item.id, item.question)">削除</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</template>


<script>
import sideBar from './sideBar/side'
export default {
  components: {
    sideBar
  },
  data: function() {
    return {
      quiz: null,
      quizId: null,
      deleteDisplay: false,
      quizCount: 0,
      selectQuiz: null,
    };
  },
  created() {
    this.getQuizList();
  },
  methods: {
    getQuizList: function() {
      axios
        .get("/api/admin/quiz")
        .then(
          response => (
            this.quiz = response.data,
            this.quizCount = response.data.length
          )
        );
    },
    deleteCheck: function(quizId, question) {
      this.quizId = quizId;
      this.deleteDisplay = true;
      this.selectQuiz = question;
    },
    async doDelete() {
      this.deleteDisplay = false;
      let quizId = {
        id: this.quizId
      };
      await axios.post("/api/admin/quiz/delete", quizId);
      this.getQuizList();
    },
    cancel: function() {
      this.deleteDisplay = false;
    }
  }
};
</script>

<style scoped>
    .img {
        width:300px;
    }
    .display {
      display: flex;
      height: 100vh;
    }
    .adminMain {
      padding: 10px 10px 30px 30px;
      flex: 1;
      overflow-y: scroll;
    }
    .text {
      text-align: right;
      width: 98%;
    }
    .tableHeader {
      background-color: rgb(117, 243, 252);
    }
    th,td {
      border: solid 1px;  /* 枠線指定 */
      padding: 10px;      /* 余白指定 */
    }
    table {
      border-collapse:  collapse; /* セルの線を重ねる */
    }
        .tableHeader:nth-child(1) {
      width: 25%;
    }
    .tableHeader:nth-child(2) {
      width: 20%;
    }
    .img {
      text-align: center;
    }
    .tableHeader:nth-child(3),
    .tableHeader:nth-child(4) {
      width: 10%;
    }
    #delete{
      /*　要素を重ねた時の順番　*/
      z-index:1;
      /*　画面全体を覆う設定　*/
      position:fixed;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background-color:rgba(0,0,0,0.5);
      /*　画面の中央に要素を表示させる設定　*/
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .selectBtn1 {
      cursor: pointer;
    }
    #content{
      z-index:2;
      width:50%;
      padding: 1em;
      background:#fff;
      text-align: center;
    }
    .selectBtn {
      cursor: pointer;
      padding: 10px;
      margin: 10px 260px;
      text-align: center;
      border-radius: 20px;
    }
    .delete:hover {
      background-color: rgb(255, 72, 0);
    }
    .cansel:hover {
      background-color: aqua;
    }
</style>
