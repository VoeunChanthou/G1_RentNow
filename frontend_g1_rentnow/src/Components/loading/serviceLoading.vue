<template>
<div class="main-loading px-5 py-5" style="display: grid; grid-template-columns: 30% 70%;">

<el-skeleton style="width: 240px">
<template #template>
  <el-skeleton-item variant="image" style="width: 240px; height: 240px" />
  <div style="padding: 14px">
    <el-skeleton-item variant="p" style="width: 50%" />
    <div
      style="
        display: flex;
        align-items: center;
        justify-items: space-between;
      "
    >
      <el-skeleton-item variant="text" style="margin-right: 16px" />
      <el-skeleton-item variant="text" style="width: 30%" />
    </div>
  </div>
</template>
</el-skeleton>
<el-skeleton :rows="5" animated />

</div>

</template>

<script>

</script>

<style>

</style>