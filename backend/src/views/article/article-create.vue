<style lang="less">
    @import '../../styles/common.less';
    @import './article-info.less';
    @import './github-markdown.css';
</style>

<template>
    <div>
        <Row>
            <Col span="18">
                <Card>
                    <Form :label-width="80" :model="formData" ref="articleForm" :rules="rules">
                        <FormItem label="文章标题" prop="title">
                            <Input v-model="formData.title"/>
                        </FormItem>
                        <FormItem label="Slug" prop="slug">
                            <Input v-model="formData.slug"/>
                        </FormItem>
                        <FormItem label="首图" prop="first_img">
                            <Input v-model="formData.first_img"/>
                        </FormItem>
                        <FormItem label="关键字" prop="keywords">
                            <Input v-model="formData.keywords"/>
                        </FormItem>
                    </Form>
                    <div class="margin-top-20">
                        <textarea id="articleEditor"></textarea>
                    </div>
                </Card>
            </Col>
            <Col span="6" class="padding-left-10">
                <Card>
                    <p slot="title">
                        <Icon type="paper-airplane"></Icon>
                        发布
                    </p>
                    <p class="margin-top-10">
                        <Icon type="pin"></Icon>&nbsp;&nbsp;置&nbsp;&nbsp;顶：&nbsp;&nbsp;
                        <i-switch v-model="formData.is_top">
                            <Icon type="android-done" slot="open"></Icon>
                            <Icon type="android-close" slot="close"></Icon>
                        </i-switch>
                    </p>
                    <Row class="margin-top-20 publish-button-con">
                        <span class="publish-button"><Button @click="handlePreview">预览</Button></span>
                        <span class="publish-button"><Button @click="handlePublish" :loading="publishLoading" icon="ios-checkmark" style="width:90px;" type="primary">发布</Button></span>
                    </Row>
                </Card>
                <div class="margin-top-10">
                    <Card>
                        <p slot="title">
                            <Icon type="ios-pricetags-outline"></Icon>
                            标签
                        </p>
                        <Row>
                            <Col span="18">
                                <Select v-model="formData.tags" @on-change="handleOnchange" multiple :placeholder="tags_name">
                                    <Option v-for="val in articleTagList" :value="val.id" :key="val.id">{{ val.tag_name }} ({{ val.article_num }})</Option>
                                </Select>
                            </Col>
                            <Col span="6" class="padding-left-10">
                                <Button v-show="!addingNewTag" @click="handleAddNewTag" long type="ghost">新建</Button>
                            </Col>
                        </Row>
                        <transition name="add-new-tag">
                            <div v-show="addingNewTag" class="add-new-tag-con">
                                <Col span="14">
                                    <Input v-model="newTagName" placeholder="请输入标签名" />
                                </Col>
                                <Col span="5" class="padding-left-10">
                                    <Button @click="createNewTag" long type="primary">确定</Button>
                                </Col>
                                <Col span="5" class="padding-left-10">
                                    <Button @click="cancelCreateNewTag" long type="ghost">取消</Button>
                                </Col>
                            </div>
                        </transition>
                    </Card>
                </div>
            </Col>
        </Row>
    </div>
</template>

<script>
import SimpleMDE from 'simplemde';
import './simplemde.min.css';
import Util from '@/libs/util.js';
export default {
    name: 'article-info',
    data () {
        return {
            formData: {
                slug: '',
                title: '',
                is_top: '',
                tags: [],
                first_img: '',
                keywords: '',
            },
            tags_name: '请选择文章标签',
            articleId: 0,
            // 所有标签列表
            articleTagList: [],
            publishLoading: false,
            addingNewTag: false, // 添加新标签
            newTagName: '', // 新建标签名
            tagIdToName: {},
            // Markdown编辑器
            simpleMDE: null,

            // 表单验证规则
            rules: {
                'title': [
                    {required: true, message: '标题不可为空', trigger: 'blur'},
                ],
                'slug': [
                    {required: true, message: 'Slug不可为空', trigger: 'blur'},
                ],
                'first_img': [
                    {required: true, message: '首图不可为空', trigger: 'blur'},
                ],
                'keywords': [
                    {required: true, message: '关键字不可为空', trigger: 'blur'},
                ],
            },
        };
    },
    methods: {
        handleOnchange (val) {
            // console.info(this.formData.tags);
        },
        handleAddNewTag () {
            this.addingNewTag = !this.addingNewTag;
        },
        createNewTag () {
            if (this.newTagName.length !== 0) {
                let _this = this;
                Util.ajax.post('/tag', {
                    tag_name: this.newTagName,
                }).then((response) => {
                    _this.articleTagList.push(response.data);
                    _this.addingNewTag = false;
                    _this.newTagName = '';
                }).catch((error) => {
                    console.log(error);
                });
            } else {
                this.$Message.error('请输入标签名');
            }
        },
        cancelCreateNewTag () {
            this.newTagName = '';
            this.addingNewTag = false;
        },
        canPublish () {
            let can = false;
            this.$refs['articleForm'].validate((valid) => {
                if (valid) {
                    if (this.formData.tags.length === 0) {
                        this.$Message.error('请选择文章标签');
                        can = false;
                    } else {
                        can = true;
                    }
                }
            });

            return can;
        },
        handlePreview () {
            this.$Message.warning('Do not complete yet!');
        },
        handlePublish () {
            if (this.canPublish()) {
                this.publishLoading = true;

                let data = {
                    title: this.formData.title,
                    slug: this.formData.slug,
                    original_md: this.simpleMDE.value(),
                    is_top: this.formData.is_top ? 1 : 0,
                    tags: this.formData.tags,
                    first_img: this.formData.first_img,
                    keywords: this.formData.keywords,
                };

                Util.ajax.post('/article', data).then((response) => {
                    this.publishLoading = false;
                    this.$Notice.success({
                        title: '保存成功',
                        desc: '文章《' + this.formData.title + '》保存成功'
                    });

                    setTimeout(() => {
                        this.formData.title = '';
                        this.formData.slug = '';
                        this.simpleMDE.value(''),
                        this.formData.is_top = false;
                        this.formData.tags = [];
                        this.formData.first_img = '';
                        this.formData.keywords = '';

                        this.$router.push({
                            path: '/articles/list',
                        })
                    }, 1000);
                }).catch((error) => {
                    this.publishLoading = false;
                    console.log(error);
                });
            }
        },
    },
    mounted () {

        Util.ajax.get('/tag').then((response) => {
            this.articleTagList = response.data;
        }).catch((error) => {
            this.$Notice.error({
                title: '获取标签列表失败',
                desc: error.message,
            });
        });

        this.simpleMDE = new SimpleMDE({
            element: document.getElementById('articleEditor'),
            toolbar: ['bold', 'italic', 'strikethrough', 'heading', 'heading-smaller', 'heading-bigger', 'heading-1', 'heading-2', 'heading-3', '|', 'code', 'quote', 'unordered-list', 'clean-block', '|', 'link', 'image', 'table', 'horizontal-rule', '|', 'preview', 'guide']
        });
    },
};
</script>
