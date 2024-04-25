<template>
    <nav v-if="totalPages > 1" class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                    <a class="page-link" href="#" rel="prev">« Previous</a>
                </li>
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    Showing
                    <span class="fw-semibold">{{ currentPage }}</span>
                    of
                    <span class="fw-semibold">{{ totalPages }}</span>
                    results
                </p>
            </div>

            <div>
                <ul class="pagination">
                    <li class="page-item" @click="changePage(1)" :class="{ 'disabled': currentPage === 1 }">
                        <a class="page-link">«</a>
                    </li>
                    <li class="page-item" v-for="page in allPages" :key="page" @click="changePage(page)"
                        :class="{ 'active': currentPage === page }">
                        <a class="page-link">{{ page }}</a>
                    </li>
                    <li class="page-item" @click="changePage(totalPages)"
                        :class="{ 'disabled': currentPage === totalPages }">
                        <a class="page-link">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        totalPages: {
            type: Number,
            required: true
        },
        currentPage: {
            type: Number,
            required: true
        }
    },
    computed: {
        allPages() {
            let startPage = Math.max(this.currentPage - 4, 1);
            let endPage = Math.min(startPage + 9, this.totalPages);

            if (endPage - startPage < 9) {
                startPage = Math.max(endPage - 9, 1);
            }

            return Array.from({length: endPage - startPage + 1}, (_, i) => startPage + i);
        }
    },
    methods: {
        changePage(page) {
            this.$emit('page-changed', page);
        },
    },
}
</script>
