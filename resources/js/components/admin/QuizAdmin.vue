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
          <table>
            <th class="tableHeader">問題</th>
            <th class="tableHeader">画像</th>
            <th class="tableHeader">カテゴリーID</th>
            <th class="tableHeader">操作</th>
            <tbody>
              <tr v-for="item in quiz">
                <th>{{ item.question }}</th>
                <td><img class="img" :src="`${item.image_name}`" /></td>
                <td>{{ item.category_id }}</td>
                <td><RouterLink :to="{name: 'quiz_edit', params: {list: item}}">編集</RouterLink> / <span @click="deleteCheck(item.id)">削除</span></td>
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
    deleteCheck: function(quizId) {
      this.quizId = quizId;
      this.deleteDisplay = true;
    },
    async doDelete() {
      this.deleteDisplay = false;
      let quizId = {
        id: this.quizId
      };
      await axios.post("/api/admin/quiz/delete", quizId);
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
      padding: 10px 0px 30px 30px;
      flex: 1;
      overflow-y: scroll;
    }
    .text {
      text-align: right;
      width: 90%;
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
</style>
