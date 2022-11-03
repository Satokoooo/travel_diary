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
                            <tr v-for="(category,index) in categories" v-bind:key="index">
                                <td v-text="category.name" width="80%"></td>
                                <td>
                                    <button @click="modalVisible = true" type="submit" class="btn btn-warning btn-sm">編集</button>
                                </td>
                                <td>
                                    <button @click="edit(category.id,index)" type="submit" class="btn btn-warning btn-sm">編集</button>
                                </td>
                                <td>
                                    <button @click="deleteRow(category.id,index)" type="submit" class="btn btn-secondary btn-sm">削除</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-show="modalVisible" @click="modalVisible = false" class="l-modal__bg">
                        <div class="l-modal">
                            <div class="p-modal">
                                <p class="p-modal__title">カテゴリ編集</p> 
                                <input v-on:keyup.enter="changeItems" v-model="text" ref="editor" type="text" class="form-control col-md-8 mb-3" name="name">
                                <button v-on:click="modalVisible = false" type="submit" class="btn btn-primary col-md-2 mb-4" value="更新">更新</button>
                                <div @click="modalVisible = false" class="p-modal__btn--close"></div>
                           </div> 
                        </div> 
                    </div>
                    <!--<form v-on:submit.prevent="addItem" class="form-group">-->
                    <!--    <div class="form-group">-->
                    <!--        <div class="input-group">-->
                    <!--            <input type="text" :value="category.name" :rel="category.id" class="form-control">-->
                    <!--            <span class="input-group-btn"><button v-on:click="setItems" class="btn btn-primary" type="submit">@{{changeButtonText}}</button></span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</form>-->
                </div>
</template>
<script>
    export default {
        data: function() {
            return{
                modalVisible: false,
                categories: {}
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
                // console.log(id)
                // this.categories.splice(index,1)
            },
            edit(index) {
                // this.categories.{index} = true
                // this.categories{index} = this.categories[index].item
                // this.editIndex = index;
                // this.text = this.items[index];
                // this.$refs.editor.focus(); 
             }
        },
        mounted: function() {
            // カテゴリデータを表示
            let self = this;
            axios
            .get('/ajax/category')
            .then(function(response){
                self.categories = response.data;
            });
        }
    };
</script>