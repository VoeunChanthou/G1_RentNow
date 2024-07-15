import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'

const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
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
      path: '/',
      name: 'shopDashboard',
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
      path: '/create/product',
      name: 'createpro',
      component: () => import('../views/Shop/product/CreateProduct.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/shop/member',
      name: 'member',
      component: () => import('../views/Shop/member/ListMember.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/add/member',
      name: 'addmember',
      component: () => import('../views/Shop/member/UserList.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/view/profile/:id',
      name: 'viewProfile',
      component: () => import('../views/Shop/member/DetailUser.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/view/member/profile/:id',
      name: 'viewMemberProfile',
      component: () => import('../views/Shop/member/DetailMember.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/feedback',
      name: 'feedback',
      component: () => import('../views/Shop/feedback/FeedBack.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/view/profile/user',
      name: 'proUser',
      component: () => import('../views/Web/Profile/ViewProfile.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/create/product/test',
      name: 'creteProd',
      component: () => import('../views/Shop/CreateProduct.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/shop/:id',
      name: 'shop',
      component: () => import('../views/Web/Shop/ProductShop.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
    {
      path: '/imgdetail',
      name: 'imagedetailshop',
      component: () => import('../views/Shop/product/ImageDetail.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/uploadimagedetail/:id',
      name: 'uploadimagedetail',
      component: () => import('../views/Shop/product/UploadImage.vue'),
      meta: {
        requiresAuth: true,
        role: 'shop owner'
      }
    },
    {
      path: '/receipt',
      name: 'receipt',
      component: () => import('../views/Web/Service/ReceiptVue.vue'),
      meta: {
        requiresAuth: true,
        role: 'user'
      }
    },
  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/home']
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
    next('/home')
  } else if (to.meta.role && !store.roles.includes(to.meta.role)) {
    // Redirect to home page if user doesn't have the required role
    next('/home')
  }else {
    next()
  }
})

export default { router, simpleAcl }
