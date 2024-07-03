import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'

const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/Web/HomeView.vue')
    },
    {
      path: '/service',
      name: 'service',
      component: () => import('../views/Web/SeviceView.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../views/Web/Service/CategoryVue.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/detail/:id',
      name: 'detail',
      component: () => import('../views/Web/Service/ProductDetail.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/history',
      name: 'history',
      component: () => import('../views/Web/HistoryPage.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/message',
      name: 'message',
      component: () => import('../views/Web/MessageView.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/aboutUs',
      name: 'aboutUs',
      component: () => import('../views/Web/AboutUs.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/shop/dashboard',
      name: 'shop',
      component: () => import('../views/Shop/DashboardView.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/shop/product',
      name: 'product',
      component: () => import('../views/Shop/ProductView.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/favorite',
      name: 'favorite',
      component: () => import('../views/Web/FavoritePage.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    }

  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/']
  const authRequired = !publicPages.includes(to.path)
  const store = useAuthStore()

  try {
    const { data } = await axiosInstance.get('/me')

    store.isAuthenticated = true
    store.user = data.data

    // console.log(data.dat);
    store.permissions = data.data.permissions.map((item: any) => item.name)
    store.roles = data.data.roles.map((item: any) => item.name)

    const rules = () =>
      defineAclRules((setRule) => {
        store.permissions.forEach((permission: string) => {
          setRule(permission, () => true)
        })
      })

    simpleAcl.rules = rules()
  } catch (error) {
    /* empty */
  }

  if (authRequired && !store.isAuthenticated) {
    next('/')
  } else if (to.meta.role && !store.roles.includes(to.meta.role)) {
    // Redirect to home page if user doesn't have the required role
    next('/')
  }else {
    next()
  }
})

export default { router, simpleAcl }
