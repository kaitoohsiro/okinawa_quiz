<template>
    <div class="sideBar">
        <h2 class="menu">Menu</h2>
        <div>
        <p class="btn"><router-link class="read" to="/admin">一覧</router-link></p>
        <p class="btn"><router-link class="new" to="/admin/create">新規作成</router-link></p>
        <!-- <router-link to="admin/create/category">カテゴリ作成</router-link> -->
        </div>
        <div class="delete" v-if="deleteDisplay">
            {{ quizId }}
            <p @click="doDelete">削除</p>
            <p @click="cancel">キャンセル</p>
        </div>
    </div>
</template>

<script>
export default {}
</script>

<style scoped>
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
.new, .read {
    color: #fff;
    text-decoration: none;
}
.delete {
    color:rgb(180, 197, 82);
    cursor: pointer;
}
</style>