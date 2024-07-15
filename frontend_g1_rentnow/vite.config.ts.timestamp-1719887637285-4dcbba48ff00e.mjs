// vite.config.ts
import { fileURLToPath, URL } from "node:url";
import { defineConfig } from "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/node_modules/vite/dist/node/index.js";
import vue from "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/node_modules/@vitejs/plugin-vue/dist/index.mjs";
import vueJsx from "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/node_modules/@vitejs/plugin-vue-jsx/dist/index.mjs";
import VueDevTools from "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/node_modules/vite-plugin-vue-devtools/dist/vite.mjs";
import Unocss from "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/node_modules/unocss/dist/vite.mjs";
import { presetAttributify, presetUno } from "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/node_modules/unocss/dist/index.mjs";
var __vite_injected_original_import_meta_url = "file:///C:/Users/ASUS%20713%20RC/OneDrive/Desktop/G1_RentNow/frontend_g1_rentnow/vite.config.ts";
var vite_config_default = defineConfig({
  plugins: [
    vue(),
    vueJsx(),
    VueDevTools(),
    Unocss({
      presets: [presetAttributify(), presetUno()]
    })
  ],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", __vite_injected_original_import_meta_url))
    }
  },
  optimizeDeps: {
    include: ["@fawmi/vue-google-maps", "fast-deep-equal"]
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcudHMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFxVc2Vyc1xcXFxBU1VTIDcxMyBSQ1xcXFxPbmVEcml2ZVxcXFxEZXNrdG9wXFxcXEcxX1JlbnROb3dcXFxcZnJvbnRlbmRfZzFfcmVudG5vd1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiQzpcXFxcVXNlcnNcXFxcQVNVUyA3MTMgUkNcXFxcT25lRHJpdmVcXFxcRGVza3RvcFxcXFxHMV9SZW50Tm93XFxcXGZyb250ZW5kX2cxX3JlbnRub3dcXFxcdml0ZS5jb25maWcudHNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0M6L1VzZXJzL0FTVVMlMjA3MTMlMjBSQy9PbmVEcml2ZS9EZXNrdG9wL0cxX1JlbnROb3cvZnJvbnRlbmRfZzFfcmVudG5vdy92aXRlLmNvbmZpZy50c1wiO2ltcG9ydCB7IGZpbGVVUkxUb1BhdGgsIFVSTCB9IGZyb20gJ25vZGU6dXJsJ1xyXG5cclxuaW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSdcclxuaW1wb3J0IHZ1ZSBmcm9tICdAdml0ZWpzL3BsdWdpbi12dWUnXHJcbmltcG9ydCB2dWVKc3ggZnJvbSAnQHZpdGVqcy9wbHVnaW4tdnVlLWpzeCdcclxuaW1wb3J0IFZ1ZURldlRvb2xzIGZyb20gJ3ZpdGUtcGx1Z2luLXZ1ZS1kZXZ0b29scydcclxuaW1wb3J0IFVub2NzcyBmcm9tICd1bm9jc3Mvdml0ZSdcclxuaW1wb3J0IHsgcHJlc2V0QXR0cmlidXRpZnksIHByZXNldFVubyB9IGZyb20gJ3Vub2NzcycgLy8gUHJlc2V0c1xyXG5cclxuLy8gaHR0cHM6Ly92aXRlanMuZGV2L2NvbmZpZy9cclxuXHJcbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XHJcbiAgcGx1Z2luczogW1xyXG4gICAgdnVlKCksXHJcbiAgICB2dWVKc3goKSxcclxuICAgIFZ1ZURldlRvb2xzKCksXHJcbiAgICBVbm9jc3Moe1xyXG4gICAgICBwcmVzZXRzOiBbcHJlc2V0QXR0cmlidXRpZnkoKSwgcHJlc2V0VW5vKCldXHJcbiAgICB9KVxyXG4gIF0sXHJcbiAgcmVzb2x2ZToge1xyXG4gICAgYWxpYXM6IHtcclxuICAgICAgJ0AnOiBmaWxlVVJMVG9QYXRoKG5ldyBVUkwoJy4vc3JjJywgaW1wb3J0Lm1ldGEudXJsKSlcclxuICAgIH1cclxuICB9LFxyXG4gIG9wdGltaXplRGVwczoge1xyXG4gICAgaW5jbHVkZTogW1wiQGZhd21pL3Z1ZS1nb29nbGUtbWFwc1wiLCBcImZhc3QtZGVlcC1lcXVhbFwiXSxcclxuICAgfSxcclxufSlcclxuXHJcblxyXG5cclxuXHJcbiJdLAogICJtYXBwaW5ncyI6ICI7QUFBZ1osU0FBUyxlQUFlLFdBQVc7QUFFbmIsU0FBUyxvQkFBb0I7QUFDN0IsT0FBTyxTQUFTO0FBQ2hCLE9BQU8sWUFBWTtBQUNuQixPQUFPLGlCQUFpQjtBQUN4QixPQUFPLFlBQVk7QUFDbkIsU0FBUyxtQkFBbUIsaUJBQWlCO0FBUGdOLElBQU0sMkNBQTJDO0FBVzlTLElBQU8sc0JBQVEsYUFBYTtBQUFBLEVBQzFCLFNBQVM7QUFBQSxJQUNQLElBQUk7QUFBQSxJQUNKLE9BQU87QUFBQSxJQUNQLFlBQVk7QUFBQSxJQUNaLE9BQU87QUFBQSxNQUNMLFNBQVMsQ0FBQyxrQkFBa0IsR0FBRyxVQUFVLENBQUM7QUFBQSxJQUM1QyxDQUFDO0FBQUEsRUFDSDtBQUFBLEVBQ0EsU0FBUztBQUFBLElBQ1AsT0FBTztBQUFBLE1BQ0wsS0FBSyxjQUFjLElBQUksSUFBSSxTQUFTLHdDQUFlLENBQUM7QUFBQSxJQUN0RDtBQUFBLEVBQ0Y7QUFBQSxFQUNBLGNBQWM7QUFBQSxJQUNaLFNBQVMsQ0FBQywwQkFBMEIsaUJBQWlCO0FBQUEsRUFDdEQ7QUFDSCxDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
