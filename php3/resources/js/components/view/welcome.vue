<style scoped></style>

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
                <tr v-for="product in items" :key="product.id">
                    <td class="border px-4 py-2">{{ product.id }}</td>
                    <td class="border px-4 py-2">{{ product.name }}</td>
                    
                    <td class="border px-4 py-2"  :style="{color: product.price > 360000 ? 'red' : 'black'}">
                         {{ product.price  }}đ
                          <span v-show="product.price > 360000"><img src="https://cdn.vectorstock.com/i/1000v/61/03/vip-crown-icon-luxury-premium-vector-45256103.jpg" alt="" width="30px"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>

const props = defineProps({
    items: {
        type: Array,
        default: () => []
    }
});
</script>