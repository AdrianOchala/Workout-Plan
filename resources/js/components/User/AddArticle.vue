<template>
    <div class="container-fluid">
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue2';
import Editor from '@heaglock/custom-classic-ckeditor5';
export default {
    name: "AddArticle",
    components:{
      ckeditor: CKEditor.component
    },
    data(){
        return{
            editor: Editor,
            editorData:'<p>Tu wpisz treść artykułu.</p>',
            editorConfig: {
                // The configuration of the editor.
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'fontFamily',
                        'fontSize',
                        'fontColor',
                        'fontBackgroundColor',
                        'highlight',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'alignment',
                        'outdent',
                        'indent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'horizontalLine',
                        '|',
                        'undo',
                        'redo'
                    ]
                },
                language: 'pl',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    //uploadUrl: '/image/send',

                    // Enable the XMLHttpRequest.withCredentials property.
                    //withCredentials: false,

                    // Headers sent along with the XMLHttpRequest to the upload server.
                }
            }

        }},

    methods: {

    },
    computed: {

    },
    created(){

    },
}
</script>

<style scoped>

</style>
