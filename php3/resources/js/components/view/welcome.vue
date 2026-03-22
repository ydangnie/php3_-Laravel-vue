<!-- resources/js/components/vue/MyComponent.vue -->

<template>
    <div class="product-list">
        <h2>Danh sách sản phẩm từ Database</h2>
        
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Tên sản phẩm</th>
                    <th class="border px-4 py-2">Giá</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dùng v-for để lặp qua mảng items nhận được từ props -->
                <tr v-for="product in items" :key="product.id">
                    <td class="border px-4 py-2">{{ product.id }}</td>
                    <td class="border px-4 py-2">{{ product.name }}</td>
                    <td class="border px-4 py-2">{{ product.price }}đ</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
// Khai báo props để nhận dữ liệu
const props = defineProps({
    items: {
        type: Array,
        default: () => []
    }
});
</script>