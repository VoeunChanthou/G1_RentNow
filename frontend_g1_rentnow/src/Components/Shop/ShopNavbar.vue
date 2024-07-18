<template>
    <!-- <el-container> -->
      <el-header style="text-align: right; font-size: 12px; background: linear-gradient(90deg, #722CB3 30%, #C49BE9); height: 80px; ">
        <div class="toolbar">
          <el-dropdown>
            <el-icon style="margin-right: 8px; margin-top: 1px; font-size: 30px;">
              <setting />
            </el-icon>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item>View</el-dropdown-item>
                <el-dropdown-item>Add</el-dropdown-item>
                <el-dropdown-item>Delete</el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
          <!-- <span>Tom</span> -->
        </div>
      </el-header>
    <!-- </el-container> -->
</template>

<script lang="ts">
import { ref } from 'vue'
  import { Menu as IconMenu, Message, Setting } from '@element-plus/icons-vue'
</script>

