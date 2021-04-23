<template>
  <div class="adminNew">
    <sideBar />
    <div class="createMain">
      <h1>Quiz</h1>
      <form class="newForm">
        <label>
          <span class="text">問題文を入力</span>
          <textarea v-model="quiz" placeholder="問題を入力"></textarea>
        </label>
        <label>
          <span class="text">カテゴリー：</span>
          <select v-model="selectCategory " @change="checkCategory">
            <option v-for="categoryName in category">{{ categoryName.category }}</option>
          </select>
        </label>
        <label>
          <input type="text" v-model="choice1" placeholder="選択肢1) 鹿児島" />
        </label>
        <label>
          <input type="text" v-model="choice2" placeholder="選択肢2) 東京" />
        </label>
        <label>
          <input type="text" v-model="answer" placeholder="答え) 沖縄" />
        </label>
        <label>
          <input type="file" @change="confirmImage" v-if="view" />
          <p v-if="confirmedImage">
            <img class="img" :src="confirmedImage" alt />
          </p>
        </label>
        <label>
          <textarea v-model="explainSentence" placeholder="解説"></textarea>
        </label>
        <button class="button" @click="onSubmit()">送信する</button>
      </form>
      {{ categoryId }}
    </div>
  </div>
</template>


<script>
import sideBar from '../../../components/admin/sideBar/side'
export default {
  components: {
    sideBar
  },
  data: function() {
    return {
      quiz: null,
      categoryId: null,
      selectCategory: "",
      selectCategoryName: null,
      categoryCount: 0,
      category: null,
      choice1: null,
      choice2: null,
      answer: null,
      image: null,
      explainSentence: null,
      confirmedImage: "",
      file: "",
      message: "",
      view: true
    };
  },
  created() {
    this.getCategory();
  },
  methods: {
    getCategory: function() {
      axios.get("/api/admin/quiz/create").then(response => {
        this.category = response.data;
        this.categoryCount = this.category.length;
      });
    },
    confirmImage(event) {
      this.message = "";
      this.file = event.target.files[0];
      if (!this.file.type.match("image.*")) {
        this.message = "画像ファイルを選択して下さい";
        this.confirmedImage = "";
        return;
      }
      this.createImage(this.file);
    },
    createImage(file) {
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = e => {
        this.confirmedImage = e.target.result;
      };
    },
    checkCategory: function() {
      for (let i = 0; i < this.categoryCount; i++) {
        if (this.category[i].category === this.selectCategory) {
          this.categoryId = this.category[i].id;
        }
      }
    },
    onSubmit: function() {
      let params = new FormData();
      params.append("quiz", this.quiz);
      params.append("categoryId", this.categoryId);
      params.append("choice1", this.choice1);
      params.append("choice1", this.choice1);
      params.append("choice2", this.choice2);
      params.append("answer", this.answer);
      params.append("explainSentence", this.explainSentence);
      params.append("file", this.file);


      axios.post('/api/admin/quiz/create', params);
    }
  }
};
</script>

<style scoped>
.adminNew {
  display: flex;
  height: 100vh;
  background-color: #cecdcd;
}
.createMain {
    padding: 10px 10px 10px 30px;
    flex: 1;
    overflow-y: scroll;
}
.newForm {
  display: flex;
  flex-direction: column;
}
.button {
  font-size: 20%;
}
label {
  margin: 5px;
}
textarea {
  width: 70%;
  height: 100px;
  border-radius: 30px;
  padding: 10px 20px;
}
.img {
  width: 500px;
}
.text {
  font-weight: bold;
}
</style>
