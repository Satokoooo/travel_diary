<template>
     <div id="modal" class="row">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="80%">カテゴリ名</th>
                                <th width="10%">編集</th>
                                <th width="10%">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category,index) in categories" v-bind:key="index"  v-on:update-cell="updateCell">
                                <td v-text="category.name" width="80%"></td>
                                <td>
                                    <button @click="edit(category.id,index)" type="submit" class="btn btn-warning btn-sm">編集</button>
                                </td>
                                <td>
                                    <button @click="deleteRow(category.id,index)" type="submit" class="btn btn-secondary btn-sm">削除</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-show="modalVisible" class="l-modal__bg">
                        <div class="l-modal">
                            <div class="p-modal">
                                <p class="p-modal__title">カテゴリ編集</p> 
                                <input v-model="text" type="text" ref="editor" class="form-control col-md-8 mb-3" name="name">
                                <button @click="update()" type="submit" class="btn btn-primary col-md-2 mb-4">更新</button>
                                <div @click="modalVisible = false;" class="p-modal__btn--close"></div>
                           </div> 
                        </div> 
                    </div>
                </div>
</template>
<script>
    export default {
        data: function() {
            return{
                modalVisible: false,
                categories: {},
                text: '',
                editIndex: -1
            };
        },
        methods: {
            // カテゴリを削除
            deleteRow: function(id,index){
                axios.delete('api/categories/' + id)
                .then((response) => {
                    console.log(response);
                    this.categories.splice(index,1);
                }).catch((error) => {
                    console.log(error);
                });
            },
            edit: function(id,index) {
               //モーダル表示
                this.modalVisible = true;
                
                console.log(this.categories[index]);
                this.editIndex = index;
                this.text = this.categories[index].name;
                this.$refs.editor.focus(); 
             },
            update: function() {
                const category = this.categories[this.editIndex];
                console.log(this.text);
                console.log(category.id);
                
                //カテゴリ名を上書き
                axios.patch('api/category/' + category.id, {name:this.text})
                .then((response) => {
                    console.log(response);
                    category.name = this.text;
                }).catch((error) => {
                    console.log(error);
                });
                
                //モーダル非表示
                this.modalVisible = false;
            },
        },
        mounted: function() {
            // カテゴリデータを取得表示
            let self = this;
            axios
            .get('/ajax/category')
            .then(function(response){
                self.categories = response.data;
            });
        }
    };
</script>