new Vue({
  
  el: '#vueApp',
  
  data: {
    requisicao: [],
    sort: {
      column: 'nome',
      reverse: false
    },
    requisicoes: {
        all: [],
        list: [],
        paginated: []
    },
    pagination: {
        perPage: 5,
        currentPage: 1,
        totalPages: 0,
        totalItems: 0,
        pageNumbers: [],
        visibleNumbers: 3
    },
    interaction: {
        visibleColumns: ['nome', 'created_at'],
        columnsToFilter: [],
        filterTerm: '',
        openDetails: [],
        sortColumn: 'nome',
        sortInverse: 0,
    },
    controls: {
        select2: null,
    }
  },

  methods: {
    setPaginationData: function(list)
    {
        var self = this,
        chunk    = _.chunk(list, self.pagination.perPage);

        Vue.set(self.requisicoes, 'paginated', chunk);
        Vue.set(self.requisicoes, 'list', chunk[0]);

        Vue.set(self.pagination, 'currentPage', 1);
        Vue.set(self.pagination, 'totalItems', list.length);
        Vue.set(self.pagination, 'totalPages', Math.ceil(list.length / self.pagination.perPage));
        Vue.set(self.pagination, 'pageNumbers', _.range(1, self.pagination.totalPages+1));
    },

    page: function(ev, page)
    {
        ev.preventDefault();

        var self = this;

        Vue.set(self.pagination, 'currentPage', page);

        Vue.set(self.requisicoes, 'list', self.requisicoes.paginated[page-1]);
    },

    next: function(ev)
    {
        ev.preventDefault();

        var self = this;

        if(self.pagination.currentPage == self.pagination.totalPages)
        {
            return false;
        }

        Vue.set(self.pagination, 'currentPage', self.pagination.currentPage+1);

        Vue.set(self.requisicoes, 'list', self.requisicoes.paginated[self.pagination.currentPage-1]);
    },

    previous: function(ev)
    {
        ev.preventDefault();

        var self = this;

        if(self.pagination.currentPage == 1)
        {
            return false;
        }

        Vue.set(self.pagination, 'currentPage', self.pagination.currentPage-1);

        Vue.set(self.requisicoes, 'list', self.requisicoes.paginated[self.pagination.currentPage-1]);
    },

    doResetAll: function()
    {
        var self = this;

        Vue.set(self.interaction, 'visibleColumns', ['nome', 'created_at']);
        Vue.set(self.interaction, 'columnsToFilter', []);
        Vue.set(self.interaction, 'filterTerm', '');
        Vue.set(self.interaction, 'openDetails', []);
        Vue.set(self.interaction, 'sortColumn', 'nome');
        Vue.set(self.interaction, 'sortInverse', 0);

        self.setPaginationData(self.requisicoes.all);

        self.controls.select2.val('').trigger('change');
    },

    doFilter: function()
    {
        var self = this,
        filtered = self.requisicoes.all;

        if(self.interaction.filterTerm != '' && self.interaction.columnsToFilter.length > 0)
        {
            filtered = _.filter(self.requisicoes.all, function(requisicao)
            {
                return self.interaction.columnsToFilter.some(function(column)
                {
                    return requisicao[column].toLowerCase().indexOf(self.interaction.filterTerm.toLowerCase()) > -1
                });
            });
        }

        self.setPaginationData(filtered);
    },

    doSort: function(ev, column)
    {
        ev.preventDefault();

        var self = this;

        self.interaction.sortColumn = column;

        if(self.interaction.sortInverse == 0)
        {
            Vue.set(self.interaction, 'sortInverse', -1);
        } else {
            Vue.set(self.interaction, 'sortInverse', 0);
        }
    },
  },

  ready: function()
  {
    var self = this;


    self.$http.get('cadastros/pesquisa/statusjson/', function(response)
      {
        Vue.$set(self.requisicoes, 'all', response);

        self.setPaginationData(response);
      });

    self.controls.select2 = jQuery(self.$els.columnsToFilterSelect).select2({
      placeholder: 'Selecionar uma ou mais colunas para filtrar!'
    }).on('change', function()
    {
        Vue.set(self.interaction, 'columnsToFilter', jQuery(this).val() || []);
    });
  }
});
