import Vue from 'vue'
import VueRouter from 'vue-router'

// 管理者画面
import Login from './pages/admin/Login.vue'
// 作成親コンポーネント
import Admin from './pages/admin/Admin.vue'
// 作成子コンポーネント
// 管理者画面一覧表示
import QuizAdmin from  './components/admin/QuizAdmin.vue'
// 作成
import CreateQuiz from  './pages/admin/create/CreateQuiz.vue'
// 編集
import EditQuiz from './pages/admin/edit/EditQuiz.vue'

// ページごとのホーム画面
import QuizHome from './pages/Quiz/QuizHome.vue'

// クイズメイン画面
import Quiz from './pages/Quiz/Quiz.vue'

// vuexストアインポート
import store from './store'

// VueRouterプラグインを使用
// <RouterView />が使用可能
Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: QuizHome
    },
    {
        path: '/quiz',
        component: Quiz
    },
    {
        path: '/login',
        component: Login,
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next('/')
            } else {
                next();
            }
        }
    },
    {
        path: '/admin',
        component: Admin,
        children: [
            {
                path: '/',
                name: 'quiz',
                component: QuizAdmin
            },
        ],
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()
            } else {
                next('/login');
            }
        }
    },
    {
        path: '/admin/create',
        component: CreateQuiz,
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()
            } else {
                next('/login');
            }
        }
    },
    {
        path: '/admin/edit',
        name: 'quiz_edit',
        component: EditQuiz,
        beforeEnter(to, from, next) {
            if (store.getters['auth/check']) {
                next()
            } else {
                next('/login');
            }
        }
    },
];

// VueRouterインスタンスを作成

const router = new VueRouter({
    mode: 'history', // urlのハッシュ化を取り除く
    routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router
