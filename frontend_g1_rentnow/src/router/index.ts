import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'

const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: () => import('../views/Admin/DashboardView.vue'),
      meta: {
        requiresAuth: true,
        role: 'admin'
      }
    },
    {
      path: '/',
      name: 'home',
      component: () => import('../views/Web/HomeView.vue')
    },
    {
      path: '/service',
      name: 'service',
      component: () => import('../views/Web/SeviceView.vue')
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../views/Web/Service/CategoryVue.vue')
    },
    {
      path: '/detail/:id',
      name: 'detail',
      component: () => import('../views/Web/Service/ProductDetail.vue')
    },
    {
      path: '/history',
      name: 'history',
      component: () => import('../views/Web/HistoryPage.vue')
    },
    {
      path: '/message',
      name: 'message',
      component: () => import('../views/Web/MessageView.vue')
    },
    {
      path: '/aboutUs',
      name: 'aboutUs',
      component: () => import('../views/Web/AboutUs.vue')
    },
    // {
    //   path: '/shop/dashboard',
    //   name: 'shop',
    //   component: () => import('../views/Shop/DashboardView.vue'),
    //   meta: {
    //     requiresAuth: true,
    //     role: 'shop owner'
    //   }
    // }
   
  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/', '/service', '/aboutUs']
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

  console.log(store.roles[0])
  if (authRequired && !store.isAuthenticated) {
    next('/')
  }else{
    next()
  }
})

// router.beforeEach(async (to, from, next) => {
//   const publicPages = ['/', '/service', '/aboutUs'];
//   const authRequired = !publicPages.includes(to.path);
//   const store = useAuthStore();

//   try {
//     const { data } = await axiosInstance.get('/me');

//     store.isAuthenticated = true;
//     store.user = data.data;
//     store.permissions = data.data.permissions.map((item: any) => item.name);
//     store.roles = data.data.roles.map((item: any) => item.name);

//     // Check if the route requires authentication
//     if (authRequired) {
//       // If the user is not authenticated, redirect them to the home page
//       if (!store.isAuthenticated) {
//         next('/');
//         return;
//       }

//       // Check if the user has the required role
//       if (to.meta.role && !store.roles.includes(to.meta.role)) {
//         next('/'); // Redirect to a different page or show an error message
//         return;
//       }
//     }

//     next();
//   } catch (error) {
//     next('/');
//   }
// });

export default { router, simpleAcl }
