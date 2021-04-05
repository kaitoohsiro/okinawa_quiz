<template>
    <div class="quiz_admin">
      <div class="display">
        <div class="sideBar">
          <h2 class="menu">Menu</h2>
          <div class="btn">
              <router-link class="new" to="admin/create">新規作成</router-link>
              <!-- <router-link to="admin/create/category">カテゴリ作成</router-link> -->
          </div>
          <div class="delete" v-if="deleteDisplay">
            {{ quizId }}
            <p @click="doDelete">削除</p>
            <p @click="cancel">キャンセル</p>
          </div>
        </div>
        <div class="adminMain">
          <h1>沖縄クイズ管理者画面</h1>
          <h2>Quiz List</h2>
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
export default {
  data: function() {
    return {
      quiz: null,
      quizId: null,
      deleteDisplay: false
    };
  },
  created() {
    this.getQuizList();
  },
  methods: {
    getQuizList: function() {
      axios
        .get("/api/admin/quiz")
        .then(response => (this.quiz = response.data));
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
    .sideBar {
      width: 10%;
      padding: 10px 50px;
      background-color: rgba(0, 0, 0, 0.7);
      text-align: center;
    }
    .menu {
      font-size: 30px;
      color: rgb(157, 146, 253);
      margin-bottom: 90px;
    }
    .btn {
      padding: 10px;
      border-radius: 10px;
    }
    .btn:hover {
      background-color: rgba(182, 59, 59, 0.7)
    }
    .new {
      color: #fff;
      text-decoration: none;
    }
    .delete {
      color:rgb(180, 197, 82);
      cursor: pointer;
    }
    .adminMain {
      padding: 30px 20px;
      flex: 1;
      overflow-y: scroll;
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
