

using CartLibrary;

namespace Ecoomerce.Controllers;

public class CartController
{

    private readonly ICartProvider _cartProvider;
    public bool IsLoading { get; private set; }
    public string ErrorMessage { get; private set; }
    public Carts Carts { get; private set; }

    public CartController(ICartProvider cartProvider)
    {
        _cartProvider = cartProvider;
    }

    public async Task InitializeAsync()
    {
        IsLoading = true;
        ErrorMessage = string.Empty;

        try
        {
          
            Carts = await _cartProvider.GetCartAsync();
        }
        catch (Exception ex)
        {
            ErrorMessage = $"Error al cargar el carrito: {ex.Message}";
        }
        finally
        {
            IsLoading = false;
        }
    }
}