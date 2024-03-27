using AuthLibrary;
using AuthLibrary.Models;
using ProductLibrary;

namespace Ecoomerce.Controllers;

public class HomeController
{
    private readonly IUserService _userService;
    private readonly IProductService _productService;

    public IList<Product>? Products { get; private set; }
    public bool IsLoading { get; private set; } = true;
    public string? ErrorMessage { get; private set; }
    public UserInfo? UserInfo { get; private set; }

    public HomeController(IUserService userService, IProductService productService)
    {
        _userService = userService;
        _productService = productService;
    }

    public async Task InitializeAsync()
    {
        try
        {
            if (await _userService.IsUserAuthenticatedAsync())
            {
                UserInfo = await _userService.GetUserInfoAsync();
            }

            Products = await _productService.Get9Paginate();
        }
        catch (Exception ex)
        {
            ErrorMessage = "Error al cargar los productos: " + ex.Message;
        }
        finally
        {
            IsLoading = false;
        }
    }
}
