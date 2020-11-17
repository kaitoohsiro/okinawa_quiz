<template>
  <div class="quiz_admin">
    <h1>Quiz List</h1>
    <div>
      <span>
        <router-link to="admin/create">新規作成</router-link>
        <!-- <router-link to="admin/create/category">カテゴリ作成</router-link> -->
      </span>
    </div>
    <div class="card">
      <ul>
        <li v-for="item in quiz">
          <span>{{ item.question }}</span>
          <span>{{ item.category_id }}</span>
          <RouterLink :to="{name: 'quiz_edit', params: {list: item}}">編集</RouterLink>
          <span @click="deleteCheck(item.id)">削除</span>
        </li>
      </ul>
      <div class="delete" v-if="deleteDisplay">
        {{ quizId }}
        <p @click="doDelete">削除</p>
        <p @click="cancel">キャンセル</p>
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
