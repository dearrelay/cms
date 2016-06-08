angular.module("KendoDemos", ["kendo.directives"])
    .controller("MyCtrl", function ($scope) {
        $scope.selectOptions = {
            placeholder: "Start typing a name....",
            dataTextField: "ProductName",
            dataValueField: "ProductID",
            valuePrimitive: true,
            autoBind: false,
            dataSource: {
                type: "odata",
                serverFiltering: true,
                transport: {
                    read: {
                        url: "http://demos.telerik.com/kendo-ui/service/Northwind.svc/Products",
                    }
                }
            }
        };
        $scope.selectedIds = [0, 0];
    })