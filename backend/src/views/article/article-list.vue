<style lang="less">
    @import './article-list.less';
    @import '../../styles/loading.less';
    @import '../../styles/common.less';
</style>

<template>
    <div class="article-list">
        <Row>
            <Card>
                <p slot="title">
                    <Icon type="ios-list"></Icon>
                    文章列表
                </p>
                <Row>
                    <Button @click="handleCreate" icon="plus-round" style="width:90px;" type="primary">发布文章</Button>
                </Row>
                <Row class="list-body">
                    <Table :columns="articleColumns" :data="articleData" @on-sort-change="changeOrder" style="width: 100%;" stripe border></Table>
                    <div style="margin: 10px">
                        <div style="float: right;">
                            <Page v-if="page.total" :total="page.total" :page-size="page.size" placement="top"  @on-page-size-change="changeSize" :page-size-opts="page.pageSizeOpts" :current="page.current" @on-change="changePage" show-sizer show-total></Page>
                        </div>
                    </div>
                    <Spin fix v-if="spin">
                        <Icon type="load-c" size=28 class="spin-icon-load"></Icon>
                        <div>加载中...</div>
                    </Spin>
                </Row>
            </Card>
        </Row>
    </div>
</template>

<script>
import Util from '@/libs/util.js';
export default {
    name: 'article-list',
    data () {
        return {
            spin: false,
            page: {
                total: 0,
                current: 1,
                size: 10,
                pageSizeOpts: [10, 30, 100],
                sort: 'id',
                order: 'desc',
            },
            articleColumns: [
                {
                    title: 'ID',
                    key: 'id',
                    width: 100,
                    sortable: 'custom',
                },
                {
                    title: 'Title',
                    key: 'title',
                    align: 'center'
                },
                {
                    title: 'Slug',
                    key: 'slug',
                    align: 'center',
                },
                {
                    title: 'Comments',
                    key: 'comment_times',
                    align: 'center',
                    sortable: 'custom',
                },
                {
                    title: 'Add Time',
                    key: 'created_at',
                    sortable: 'custom',
                },
                {
                    title: 'Is Top',
                    key: 'is_top',
                    align: 'center',
                    render: (h, params) => {
                        let icon = params.row.is_top ? 'checkmark-round' : 'close-round';
                        return h('Icon', {
                            props: {
                                type: icon,
                            },
                        });
                    },
                    sortable: 'custom',
                },
                {
                    title: 'Operate',
                    key: 'show_more',
                    align: 'center',
                    render: (h, params) => {
                        return h('div', [
                            h('Button', {
                                props: {
                                    type: 'primary',
                                    size: 'small'
                                },
                                style: {
                                    marginRight: '5px'
                                },
                                on: {
                                    click: () => {
                                        let argu = { article_id: params.row.id };
                                        this.$router.push({
                                            name: 'article-info',
                                            params: argu
                                        });
                                    }
                                }
                            }, '编辑'),
                            h('Button', {
                                props: {
                                    type: 'error',
                                    size: 'small'
                                },
                                on: {
                                    click: () => {
                                        this.handleDel(params.row.id, params.row.title);
                                    }
                                }
                            }, '删除')
                        ]);
                    }
                }
            ],
            articleData: [],
        };
    },
    watch: {
        'page.current': function (val, oldVal) {
            this.getarticleList();
        },
        'page.size': function (val, oldVal) {
            this.getarticleList();
        },
    },
    methods: {
        changeOrder(col) {
            this.page.sort = col.key;
            this.page.order = col.order;

            this.getarticleList();
        },
        changePage(currentPage) {
            this.page.current = currentPage;
        },
        changeSize(size) {
            this.page.size = size;
        },
        getarticleList() {
            let _this = this;
            _this.spin = true;
            Util.ajax.get('/article', {
                params: {
                    limit: _this.page.size,
                    page: _this.page.current,
                    sort: _this.page.sort,
                    order: _this.page.order,
                }
            }).then(function(response) {
                _this.spin = false;
                _this.page.total = response.data.total;
                _this.articleData = response.data.rows;
            }).catch(function (error) {
                _this.spin = false;
                if (error.status === 401) {
                    // _this.$router.push({
                    //
                    // });
                }
            });
        },
        mockList(num) {
            let arr = [];
            for (let i = 0; i < num; i ++) {
                let id = i + 1;
                let s = {id:id,title:`article Title ${id}`,slug:`article-${id}`,comment_times:Math.round(Math.random()*100),create_at:"2018-02-22 02:22:22"};
                arr.push(s);
            }

            return {total: num * 2, rows: arr};
        },
        handleCreate() {
            this.$router.push({
                path: '/article-create',
            })
        },
        handleDel(id, title) {
            this.$Modal.confirm({
                title: '确认删除？',
                loading: true,
                content: `<p>确认删除文章：《${title}》</p>`,
                onOk: () => {
                    Util.ajax.post(`/article-del/${id}`).then((response) => {
                        this.$Modal.remove();
                        this.$Message.success(`<p>删除文章：《${title}》成功！</p>`);
                        setTimeout(() => {
                            this.getarticleList();
                        }, 500);
                    }).catch((error) => {
                        this.$Modal.remove();
                        console.log(error);
                    });
                }
            });
        }
    },
    mounted () {
        this.getarticleList();
    }
};
</script>
