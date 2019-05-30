/* Scripts for page Cash Flow */

$(document).ready(function () {
    $("#search_customer").select2({
        minimumInputLength: 3,
        tags: [],
        ajax: {
            url: "/cashFlow/searchCustomer",
            data: function (params) {
                return {
                    name: params.term, // search text
                };
            },
            processResults: function(obj) {
                return {
                    results: $.map(JSON.parse(obj.data), function(item, index) {
                        return {
                            'id': item.id_customer,
                            'text': item.full_name
                        };
                    })
                };
            }
        }
    });

    $("#search_accountPlan").select2({
        minimumInputLength: 3,
        tags: [],
        ajax: {
            url: "/cashFlow/searchAccountPlan",
            data: function (params) {
                return {
                    name: params.term, // search text
                };
            },
            processResults: function(obj) {
                return {
                    results: $.map(JSON.parse(obj.data), function(item, index) {
                        return {
                            'id': item.id_account_plan,
                            'text': item.name
                        };
                    })
                };
            }
        }
    });

    $("#search_bank").select2({
        minimumInputLength: 3,
        tags: [],
        ajax: {
            url: "/cashFlow/searchBank",
            data: function (params) {
                return {
                    name: params.term, // search text
                };
            },
            processResults: function(obj) {
                return {
                    results: $.map(JSON.parse(obj.data), function(item, index) {
                        return {
                            'id': item.id_bank,
                            'text': item.name
                        };
                    })
                };
            }
        }
    });

    $("#search_supplier").select2({
        minimumInputLength: 3,
        tags: [],
        ajax: {
            url: "/cashFlow/searchSupplier",
            data: function (params) {
                return {
                    name: params.term, // search text
                };
            },
            processResults: function(obj) {
                return {
                    results: $.map(JSON.parse(obj.data), function(item, index) {
                        return {
                            'id': item.id_supplier,
                            'text': item.name
                        };
                    })
                };
            }
        }
    });

});